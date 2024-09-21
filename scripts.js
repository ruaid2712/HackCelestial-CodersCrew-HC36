document.querySelector('.theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark');
    
    const themeText = this.textContent === '🌙 Toggle Theme' ? '☀️ Toggle Theme' : '🌙 Toggle Theme';
    this.textContent = themeText;
});
