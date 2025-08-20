# Mailpit Setup Script for Windows
# This script downloads and runs Mailpit for local email testing

Write-Host "Setting up Mailpit for local email testing..." -ForegroundColor Green

# Check if mailpit.exe already exists
if (Test-Path "mailpit.exe") {
    Write-Host "Mailpit already downloaded." -ForegroundColor Yellow
} else {
    Write-Host "Downloading Mailpit..." -ForegroundColor Blue
    try {
        # Download Mailpit for Windows
        $url = "https://github.com/axllent/mailpit/releases/latest/download/mailpit-windows-amd64.exe"
        Invoke-WebRequest -Uri $url -OutFile "mailpit.exe" -UseBasicParsing
        Write-Host "Mailpit downloaded successfully!" -ForegroundColor Green
    } catch {
        Write-Host "Failed to download Mailpit. Please download manually from:" -ForegroundColor Red
        Write-Host "https://github.com/axllent/mailpit/releases/latest" -ForegroundColor Yellow
        Write-Host "Download 'mailpit-windows-amd64.exe' and rename it to 'mailpit.exe'" -ForegroundColor Yellow
        exit 1
    }
}

# Start Mailpit
Write-Host "Starting Mailpit on port 1025 (SMTP) and 8025 (Web UI)..." -ForegroundColor Blue
Write-Host "Web interface will be available at: http://localhost:8025" -ForegroundColor Cyan
Write-Host "Press Ctrl+C to stop Mailpit" -ForegroundColor Yellow
Write-Host ""

# Run Mailpit
try {
    .\mailpit.exe --smtp 127.0.0.1:1025 --listen 127.0.0.1:8025
} catch {
    Write-Host "Failed to start Mailpit. Make sure port 1025 and 8025 are available." -ForegroundColor Red
    exit 1
}
