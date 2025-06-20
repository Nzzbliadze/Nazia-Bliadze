document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".header-menu li a");
    const currentPath = window.location.pathname;

    navLinks.forEach(link => {
        let linkHref = link.getAttribute('href');
        linkHref = linkHref.replace(/\.php$/i, '');
        linkHref = (linkHref.endsWith('/') && linkHref.length > 1) ? linkHref.slice(0, -1) : linkHref;
        if (linkHref === '' || linkHref === 'index') {
            linkHref = '/';
        }
        let normalizedCurrentPath = currentPath.replace(/(index\.php|index\.html|index\.htm)$/i, '');
        normalizedCurrentPath = (normalizedCurrentPath.endsWith('/') && normalizedCurrentPath.length > 1) ? normalizedCurrentPath.slice(0, -1) : normalizedCurrentPath;
        if (normalizedCurrentPath === '') {
            normalizedCurrentPath = '/';
        }

        if (linkHref === normalizedCurrentPath) {
            link.classList.add("active");
        }
    });
});
function openViewer(fileName, fileType) {
    const viewer = document.getElementById('file-viewer');
    const content = document.getElementById('viewer-content');
    viewer.style.display = 'block';

    let closeButton = `<span class="submit-button" onclick="closeViewer()">×</span>`;

    if (fileType === 'txt') {
        fetch('archive.php?file=' + encodeURIComponent(fileName) + '&action=load')
            .then(response => response.text())
            .then(text => {
                content.innerHTML = `
          ${closeButton}
          <form method="POST" action="archive.php">
            <input type="hidden" name="file" value="${fileName}">
            <textarea name="content" rows="20" style="width:100%;">${text}</textarea>
            <div class="button-group">
              <button type="submit" name="save" class="submit-button">💾 Save</button>
              <a href="uploads/${encodeURIComponent(fileName)}" download class="submit-button">⬇️ Download</a>
              <button type="submit" name="delete" class="submit-button" onclick="return confirm('Delete this file?')">🗑️ Delete</button>
            </div>
          </form>
        `;
            });
    } else if (fileType === 'pdf') {
        content.innerHTML = `
      ${closeButton}
      <iframe src="uploads/${encodeURIComponent(fileName)}" style="width:100%; height:600px;" frameborder="0"></iframe>
      <div class="button-group">
        <a href="uploads/${encodeURIComponent(fileName)}" download class="submit-button">⬇️ Download</a>
        <a href="archive.php?delete=${encodeURIComponent(fileName)}" onclick="return confirm('Delete this file?')" class="submit-button">🗑️ Delete</a>
      </div>
    `;
    } else if (fileType === 'docx') {
        const fullUrl = window.location.origin + '/uploads/' + encodeURIComponent(fileName);
        content.innerHTML = `
      ${closeButton}
      <iframe src="https://docs.google.com/gview?url=${fullUrl}&embedded=true"
              style="width:100%; height:600px;" frameborder="0"></iframe>
      <div class="button-group">
        <a href="uploads/${encodeURIComponent(fileName)}" download class="submit-button">⬇️ Download</a>
        <a href="archive.php?delete=${encodeURIComponent(fileName)}" onclick="return confirm('Delete this file?')" class="submit-button">🗑️ Delete</a>
      </div>
    `;
    } else {
        content.innerHTML = `<p>Preview not supported for this file type.</p>`;
    }
}

function closeViewer() {
    const viewer = document.getElementById('file-viewer');
    document.getElementById('viewer-content').innerHTML = '';
    viewer.style.display = 'none';
}
function toggleLogin() {
    document.getElementById('register-section').style.display = 'none';
    document.getElementById('login-section').style.display = 'block';
}