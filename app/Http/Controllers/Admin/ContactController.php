<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        $stats = [
            'total' => Contact::count(),
            'new' => Contact::where('status', 'new')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
            'today' => Contact::whereDate('created_at', today())->count()
        ];
        
        return view('admin.contacts.index', compact('contacts', 'stats'));
    }

    public function show(Contact $contact)
    {
        // Statusni 'read' ga o'zgartirish
        if ($contact->status == 'new') {
            $contact->update(['status' => 'read']);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,spam',
            'admin_notes' => 'nullable|string'
        ]);

        $contact->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->route('admin.contacts.show', $contact)
            ->with('success', 'Status muvaffaqiyatli yangilandi!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Xabar muvaffaqiyatli o\'chirildi!');
    }
    
    public function export()
    {
        $contacts = Contact::all();
        $fileName = 'contacts_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Ism', 'Email', 'Telefon', 'Mavzu', 'Xabar', 'Holat', 'Sana']);
            
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    substr($contact->message, 0, 100) . '...',
                    $this->getStatusText($contact->status),
                    $contact->created_at->format('Y-m-d H:i')
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    private function getStatusText($status)
    {
        $statuses = [
            'new' => 'Yangi',
            'read' => "O'qilgan",
            'replied' => 'Javob berilgan',
            'spam' => 'Spam'
        ];
        
        return $statuses[$status] ?? $status;
    }
}