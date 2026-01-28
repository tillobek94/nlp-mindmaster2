#!/bin/bash

echo "🔍 LOYIHA TUZILISHI - TO'LIQ TAHLIL"
echo "===================================="

# 1. App struktura
echo ""
echo "1. 📁 APP STRUKTURA"
echo "-------------------"
echo "Controllers:"
ls app/Http/Controllers/Admin/ 2>/dev/null | sed 's/^/  /'
echo ""
echo "Models:"
ls app/Models/ 2>/dev/null | sed 's/^/  /'

# 2. Views struktura
echo ""
echo "2. 👁️ VIEWS STRUKTURA"
echo "---------------------"
echo "Front:"
ls resources/views/front/ 2>/dev/null | sed 's/^/  /'
echo ""
echo "Admin:"
for folder in $(find resources/views/admin -type d -maxdepth 1 2>/dev/null); do
    if [ "$folder" != "resources/views/admin" ]; then
        echo "  $(basename "$folder"):"
        ls "$folder"/*.blade.php 2>/dev/null | xargs -I {} basename {} | sed 's/^/    /'
    fi
done

# 3. Database
echo ""
echo "3. 🗄️ DATABASE"
echo "-------------"
echo "Migrations:"
ls database/migrations/ 2>/dev/null | head -10 | sed 's/^/  /'

# 4. Routes
echo ""
echo "4. 🛤️ ROUTES"
echo "-----------"
echo "Web routes soni: $(grep -c "Route::" routes/web.php 2>/dev/null)"

# 5. Muhim fayllar
echo ""
echo "5. ✅ MUHIM FAYLLAR"
echo "------------------"
important_files=(
    "app/Http/Controllers/PageController.php"
    "resources/views/front/index.blade.php"
    "app/Models/Feature.php"
    "app/Models/Testimonial.php"
    "app/Models/Statistic.php"
    ".env"
)

for file in "${important_files[@]}"; do
    if [ -f "$file" ]; then
        echo "✓ $file"
    else
        echo "✗ $file"
    fi
done

echo ""
echo "📊 STATISTIKA"
echo "------------"
echo "Jami Blade fayllari: $(find resources/views -name "*.blade.php" 2>/dev/null | wc -l)"
echo "Jami Controller lar: $(find app/Http/Controllers -name "*Controller.php" 2>/dev/null | wc -l)"
echo "Jami Model lar: $(find app/Models -name "*.php" 2>/dev/null | wc -l)"
