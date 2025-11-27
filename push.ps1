git add .

# ask for the commit message
$commitMessage = Read-Host "Enter commit message"

git commit -m "$commitMessage"

git push origin main