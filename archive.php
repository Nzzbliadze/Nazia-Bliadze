<?php
session_start();
$uploadsDir = 'uploads/';

if (isset($_GET['action']) && $_GET['action'] === 'load' && isset($_GET['file'])) {
  $file = basename($_GET['file']);
  $filePath = $uploadsDir . $file;

  if (file_exists($filePath)) {
    echo htmlspecialchars(file_get_contents($filePath));
  } else {
    http_response_code(404);
    echo "File not found.";
  }
  exit;
}

if (isset($_GET['delete'])) {
  $deleteFile = basename($_GET['delete']);
  $deletePath = $uploadsDir . $deleteFile;
  if (file_exists($deletePath)) {
    unlink($deletePath);
    $_SESSION['message'] = "Deleted $deleteFile.";
  } else {
    $_SESSION['error'] = "File not found.";
  }
  header("Location: archive.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file']) && isset($_POST['content'])) {
  $saveFile = basename($_POST['file']);
  $savePath = $uploadsDir . $saveFile;
  if (file_exists($savePath) && pathinfo($savePath, PATHINFO_EXTENSION) === 'txt') {
    file_put_contents($savePath, $_POST['content']);
    $_SESSION['message'] = "Changes saved for $saveFile.";
  } else {
    $_SESSION['error'] = "Cannot save. File does not exist or is not editable.";
  }
  header("Location: archive.php?view=" . urlencode($saveFile));
  exit;
}

$viewingFile = isset($_GET['view']) ? basename($_GET['view']) : null;
$viewingPath = $viewingFile ? $uploadsDir . $viewingFile : null;
$viewingType = $viewingPath ? pathinfo($viewingPath, PATHINFO_EXTENSION) : null;
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body>
  <main class="main">
    <h2>Historical Archive Portal</h2>

    <?php if (!isset($_COOKIE['user_name'])): ?>
      <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['message']);
        unset($_SESSION['message']); ?></div>
      <?php endif; ?>
      <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?></div>
      <?php endif; ?>
<div class="contact-content-wrapper">
      <div id="register-section" class="register-section">
        <form action="signup.php" method="POST">
          <fieldset>
            <legend>Register</legend>
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" name="fullname" required />
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" required />
            </div>
            <div class="form-group">
              <label>Create Password</label>
              <input type="password" name="password" required />
              <?php if (!empty($_SESSION['password_warning'])): ?>
                <div style="color: red; font-size: 0.9em;">
                  <?= htmlspecialchars($_SESSION['password_warning']) ?>
                </div>
                <?php unset($_SESSION['password_warning']); ?>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" required />
            </div>
            <button type="submit" class="submit-button">Register</button>
          </fieldset>
        </form>
        <a class="toggle-link" onclick="toggleLogin()">Already have an account? Log in</a>
      </div>
</div>
<div class="contact-content-wrapper">
      <div id="login-section" class="login-section" style="display:none">
        <form action="login.php" method="POST">
          <fieldset>
            <legend>Login</legend>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" required />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" required />
            </div>
            <button type="submit" class="submit-button">Login</button>
          </fieldset>
        </form>
      </div>
      </div>
    <?php else: ?>
      <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['message']);
        unset($_SESSION['message']); ?></div>
      <?php endif; ?>
      <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?></div>
      <?php endif; ?>

      <h4>Welcome, <?= htmlspecialchars($_COOKIE['user_name']) ?>!</h4>

      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Upload a File</legend>
          <input type="file" name="uploadedFile" accept=".pdf,.docx,.txt" required>
          <button type="submit" name="submit" class="submit-button">Upload</button>
        </fieldset>
      </form>

      <div class="uploaded-files">
        <h4>Your Files</h4>
        <?php
        if (!file_exists($uploadsDir))
          mkdir($uploadsDir, 0777, true);
        $uploadedFiles = array_diff(scandir($uploadsDir), ['.', '..']);
        foreach ($uploadedFiles as $file):
          $filePath = $uploadsDir . $file;
          $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
          if (!in_array($fileType, ['pdf', 'docx', 'txt']))
            continue;
          $icon = match ($fileType) {
            'pdf' => 'Gallery/pdf.png',
            'docx' => 'Gallery/word.png',
            'txt' => 'Gallery/txt.png',
            default => 'Gallery/file.png'
          };
          ?>
          <div class="file-entry">
            <img src="<?= $icon ?>" alt="<?= $fileType ?>" class="file-icon">
            <a href="?view=<?= urlencode($file) ?>"><?= htmlspecialchars($file) ?></a>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if ($viewingFile && file_exists($viewingPath)): ?>
        <div class="file-viewer" style="margin-top: 30px;">
          <h4>Viewing: <?= htmlspecialchars($viewingFile) ?></h4>

          <br><br>
          <?php if ($viewingType === 'txt'): ?>
            <form method="POST">

              <input type="hidden" name="file" value="<?= htmlspecialchars($viewingFile) ?>">
              <textarea name="content" rows="15"
                style="width: 100%;"><?= htmlspecialchars(file_get_contents($viewingPath)) ?></textarea>
              <br>
              <div class="form-btm">
                <a href="archive.php" class="submit-button">Close</a>
                <button type="submit" class="submit-button">Save</button>
                <a href="<?= $viewingPath ?>" download class="submit-button">Download</a>
                <a href="archive.php?delete=<?= urlencode($viewingFile) ?>" onclick="return confirm('Delete this file?')"
                  class="submit-button">Delete</a>
              </div>
            </form>
          <?php else: ?>
            <iframe src="<?= $viewingPath ?>" width="100%" height="600px" style="border:1px solid #ccc;"></iframe>
            <br>
            <a href="archive.php" class="submit-button">Close</a>
            <a href="<?= $viewingPath ?>" download class="submit-button">Download</a>
            <a href="archive.php?delete=<?= urlencode($viewingFile) ?>" onclick="return confirm('Delete this file?')"
              class="submit-button">Delete</a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <a href="logout.php" class="logout-link">Logout</a>
    <?php endif; ?>
  </main>
  <?php require_once 'footer.php'; ?>
</body>

</html>