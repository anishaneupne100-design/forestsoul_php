# 1. Define the IDE Stack (2025 Industry Standards)
$extensionIds = @(
    "DEVSENSE.phptools-vscode",      # Core: Intelligence, Debugging, Testing
    "DEVSENSE.composer-vscode",      # Managed Composer integration
    "DEVSENSE.intelli-php-vscode",   # Local AI context-aware completion
    "DEVSENSE.profiler-vscode",      # Performance profiling
    "editorconfig.editorconfig",     # Style consistency
    "formulahendry.auto-rename-tag", # Essential for PHP/HTML mixed files
    "formulahendry.auto-close-tag",  # Faster HTML authoring
    "eamodio.gitlens"                # Professional Git integration
)

Write-Host "`n[1/4] Installing Extensions via VS Code CLI..." -ForegroundColor Cyan
foreach ($id in $extensionIds) {
    Write-Host "Installing: $id" -ForegroundColor Gray
    code --install-extension $id --force | Out-Null
}

# 2. Ensure .vscode directory exists
$vscodeDir = ".vscode"
if (!(Test-Path $vscodeDir)) {
    New-Item -ItemType Directory -Path $vscodeDir | Out-Null
}

# 3. Create/Update .vscode/settings.json
Write-Host "[2/4] Generating Workspace Settings..." -ForegroundColor Cyan
$settings = @{
    "php.version"                     = "8.4"
    "php.problems.scope"              = "all"
    "php.format.codeStyle"            = "PSR-12"
    "php.format.rules.indentHtml"     = $true
    "php.completion.autoimport"       = "auto-import"
    "php.suggest.basic"               = $false
    "editor.formatOnSave"             = $true
    "editor.defaultFormatter"         = "DEVSENSE.phptools-vscode"
    "editor.codeActionsOnSave"        = @{
        "source.organizeImports"      = "explicit"
    }
    # Link HTML formatting to VS Code's standard (Devsense respects this)
    "html.format.wrapLineLength"      = 120
    "html.format.unformatted"         = "wbr"
}
$settings | ConvertTo-Json -Depth 10 | Out-File -FilePath "$vscodeDir/settings.json" -Encoding utf8

# 4. Create/Update .vscode/extensions.json (Recommendations)
Write-Host "[3/4] Generating Workspace Recommendations..." -ForegroundColor Cyan
$recommendations = @{
    "recommendations" = $extensionIds
}
$recommendations | ConvertTo-Json -Depth 10 | Out-File -FilePath "$vscodeDir/extensions.json" -Encoding utf8

Write-Host "[4/4] Done! Workspace is now a full PHP IDE.`n" -ForegroundColor Green
Write-Host "TIP: Restart VS Code to ensure all Language Server features are active." -ForegroundColor Yellow

Write-Host "TIP: Use 'Ctrl+Shift+P' -> 'PHP Tools: Check Setup' to verify configuration." -ForegroundColor Yellow