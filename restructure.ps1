# Set the current working directory (CWD) to where you run the script
$CWD = Get-Location

# Get all .php files ONLY in the current directory (not in subfolders)
$phpFiles = Get-ChildItem -Path $CWD -File -Include '*.php' -Depth 0

# List of files to skip from the restructuring process
$skipFiles = @('index.php', 'head.php', 'footer.php')

# Define the search pattern for include statements
$pattern = "(include(?:_once)?\s*(?:\()?\s*['""])(?!../)([^'""]+)"
# The replacement string inserts '../' before the captured path ($2).
$replacement = "`$1../`$2"

Write-Host "---"
Write-Host "Starting combined restructure and path fix..."
Write-Host "---"

foreach ($file in $phpFiles) {

    $filename = $file.Name
    if ($skipFiles -contains $filename) {
        Write-Host "Skipping file: $filename (Restructure and Path Fix)"
        continue
    }

    # 1. Get the name of the new directory (e.g., 'staff.php' becomes 'staff')
    $folderName = $file.BaseName
    
    # 2. Define the full path for the new directory
    $newFolderPath = Join-Path -Path $CWD -ChildPath $folderName
    
    # 3. Define the full path for the new index.php file
    $newFilePath = Join-Path -Path $newFolderPath -ChildPath 'index.php'
    
    # --- MOVEMENT/RESTRUCTURING STEP ---
    Write-Host "Processing: $($file.Name)"
    
    # 3a. Create the new directory
    New-Item -Path $newFolderPath -ItemType Directory | Out-Null
    
    # 4. Move and rename the file
    Write-Host "  Moving to '$folderName\index.php'"
    Move-Item -Path $file.FullName -Destination $newFilePath -Force

    # --- PATH CORRECTION STEP (Using the NEW path) ---
    
    # Read the entire content of the *newly moved* file
    # CRITICAL FIX: Use $newFilePath instead of $file.FullName
    $content = Get-Content -Path $newFilePath -Raw
    
    # Use the -replace operator to find and replace the pattern in the content
    $newContent = $content -replace $pattern, $replacement
    
    # Check if any change was actually made
    if ($newContent -ne $content) {
        # Write the modified content back to the *newly moved* file
        # CRITICAL FIX: Use $newFilePath instead of $file.FullName
        $newContent | Set-Content -Path $newFilePath -Force
        Write-Host "  ✅ Corrected include paths in index.php."
    } else {
        Write-Host "  - No relative include paths found or needed correction."
    }
    Write-Host "---"
}

Write-Host "`n Restructuring process completed. Your files have been restructured and paths fixed."