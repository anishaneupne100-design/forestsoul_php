# Set the current working directory (CWD) to where you run the script
$CWD = Get-Location

# Get all .php files ONLY in the current directory (not in subfolders)
# -Include '*.php' specifies the file type
# -Depth 0 ensures only the current directory is searched
$phpFiles = Get-ChildItem -Path $CWD -File -Include '*.php' -Depth 0


foreach ($file in $phpFiles) {
    # 1. Get the name of the new directory (e.g., 'staff.php' becomes 'staff')
    $folderName = $file.BaseName
    
    # 2. Define the full path for the new directory
    $newFolderPath = Join-Path -Path $CWD -ChildPath $folderName
    
    # 3. Create the new directory
    Write-Host "Creating folder: $folderName"
    New-Item -Path $newFolderPath -ItemType Directory | Out-Null
    
    # 4. Define the full path for the new index.php file
    $newFilePath = Join-Path -Path $newFolderPath -ChildPath 'index.php'
    
    # 5. Move and rename the file
    Write-Host "  Moving '$($file.Name)' to '$folderName\index.php'"
    Move-Item -Path $file.FullName -Destination $newFilePath -Force
}

Write-Host "`nProcess completed. Your files have been restructured."