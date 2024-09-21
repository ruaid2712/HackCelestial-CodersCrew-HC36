<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resume Builder open.AI</title>
  <style>
    body {
      background-color: #f4f4f9;
      font-family: "Arial", sans-serif;
      margin: 0;
      padding: 0;
    }

    /* nav */
    nav {
      background-color: #1c1c1c;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline;
    }

    nav ul li a {
      text-decoration: none;
      color: #f1f1f1;
      font-size: 18px;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 8px;
      transition: background-color 0.3s;
    }

    nav ul li a:hover {
      background-color: #007bff;
    }

    .logo {
      color: #ffffff;
      font-size: 24px;
      font-weight: bold;
    }

    .container {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .header {
      text-align: left;
      padding-bottom: 20px;
      border-bottom: 2px solid #e6e6e6;
    }

    h1 {
      color: #333;
      font-size: 32px;
      margin-bottom: 5px;
    }

    h2 {
      font-size: 20px;
      color: #666;
      margin-bottom: 5px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .form-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    label {
      flex: 1;
      margin-right: 10px;
      font-weight: bold;
      color: #333;
    }

    input,
    select,
    textarea {
      flex: 2;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    textarea {
      height: 80px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 15px;
      font-size: 18px;
      border-radius: 5px;
      margin-top: 10px;
    }

    .resume-template {
      padding: 20px;
      border: 1px solid #ddd;
      margin-top: 20px;
      background-color: #fff;
      border-radius: 8px;
      font-family: Arial, sans-serif;
    }

    .resume-template h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .resume-template p {
      font-size: 16px;
      margin-bottom: 5px;
    }

    .resume-template ul {
      margin: 10px 0;
      padding-left: 20px;
    }

    .resume-template ul li {
      font-size: 16px;
    }

    .resume-template h2 {
      margin-top: 20px;
      font-size: 20px;
      border-bottom: 1px solid #333;
      padding-bottom: 5px;
    }

    #downloadButton {
      background-color: #4caf50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      font-size: 18px;
      border-radius: 5px;
      margin-top: 20px;
      display: none;
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">JobsCraft</div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="jobs.php">Jobs</a></li>
      <li><a href="internships.php">Internship</a></li>
      <li><a href="collaboration.php">Collaboration</a></li>
      <li><a href="challenge.php">Challenge</a></li>
      <li><a href="openAI.php">Resume Builder</a></li>
      <li><a href="leaderboard.php">Leaderboard</a></li>
      <?php if (isset($_SESSION['email'])): ?>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="student-login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <div class="container">
    <div class="header">
      <h1>Resume Builder open.AI</h1>
      <h2>Version 0.2</h2>
    </div>

    <form id="resumeForm">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required />
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" required />
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label for="objective">Objective</label>
        <textarea id="objective" name="objective" required></textarea>
      </div>

      <div class="form-group">
        <label for="university">University Name</label>
        <input type="text" id="university" name="university" required />
      </div>

      <div class="form-group">
        <label for="college">College/Diploma/12th</label>
        <input type="text" id="college" name="college" required />
      </div>

      <div class="form-group">
        <label for="cga">CGA (Cumulative Grade Average)</label>
        <input type="text" id="cga" name="cga" required />
      </div>

      <div class="form-group">
        <label for="skills">Skills</label>
        <select id="skills" name="skills[]" multiple required>
          <option value="Python">Python</option>
          <option value="Java">Java</option>
          <option value="C">C</option>
          <option value="C++">C++</option>
          <option value="Web Development">Web Development</option>
          <option value="Freelancing">Freelancing</option>
        </select>
      </div>

      <div class="form-group">
        <label for="projects">Projects</label>
        <textarea id="projects" name="projects" required></textarea>
      </div>

      <div class="form-group">
        <label for="experience">Work Experience</label>
        <textarea id="experience" name="experience" required></textarea>
      </div>

      <div class="form-group">
        <label for="languages">Other Languages</label>
        <input type="text" id="languages" name="languages" required />
      </div>

      <div class="form-group">
        <label for="spokenLanguages">Spoken Languages</label>
        <input type="text" id="spokenLanguages" name="spokenLanguages" required />
      </div>

      <input type="submit" value="Generate Resume" />
    </form>

    <div id="resumeDisplay" class="resume-template"></div>
    <button id="downloadButton">Download PDF</button>
  </div>

  <!-- Add jsPDF library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

  <script>
    document
      .getElementById("resumeForm")
      .addEventListener("submit", function (event) {
        event.preventDefault();

        // Get form values
        const name = document.getElementById("name").value;
        const address = document.getElementById("address").value;
        const phone = document.getElementById("phone").value;
        const email = document.getElementById("email").value;
        const objective = document.getElementById("objective").value;
        const university = document.getElementById("university").value;
        const college = document.getElementById("college").value;
        const cga = document.getElementById("cga").value;
        const skills = Array.from(
          document.getElementById("skills").selectedOptions
        ).map((option) => option.value);
        const projects = document.getElementById("projects").value;
        const experience = document.getElementById("experience").value;
        const languages = document.getElementById("languages").value;
        const spokenLanguages =
          document.getElementById("spokenLanguages").value;

        // Generate resume content
        let resumeContent = `<div class="resume-template">
                <h1>${name}</h1>
                <p>${address} | ${phone} | ${email}</p>`;

        if (objective) {
          resumeContent += `<h2>Objective</h2><p>${objective}</p>`;
        }

        if (university || college) {
          resumeContent += `<h2>Education</h2>`;
          if (university)
            resumeContent += `<p><strong>University:</strong> ${university}</p>`;
          if (college)
            resumeContent += `<p><strong>College/Diploma/12th:</strong> ${college}</p>`;
          if (cga) resumeContent += `<p><strong>CGA:</strong> ${cga}</p>`;
        }

        if (experience) {
          resumeContent += `<h2>Relevant Industry Experience</h2><p>${experience}</p>`;
        }

        if (skills.length > 0) {
          resumeContent += `<h2>Skills</h2><ul>${skills
            .map((skill) => `<li>${skill}</li>`)
            .join("")}</ul>`;
        }

        if (projects) {
          resumeContent += `<h2>Projects</h2><p>${projects}</p>`;
        }

        if (languages) {
          resumeContent += `<h2>Other Languages</h2><p>${languages}</p>`;
        }

        if (spokenLanguages) {
          resumeContent += `<h2>Spoken Languages</h2><p>${spokenLanguages}</p>`;
        }

        resumeContent += `</div>`;

        // Display resume
        document.getElementById("resumeDisplay").innerHTML = resumeContent;

        // Show download button
        document.getElementById("downloadButton").style.display = "block";
      });

    document
      .getElementById("downloadButton")
      .addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        html2canvas(document.getElementById("resumeDisplay")).then(function (
          canvas
        ) {
          const imgData = canvas.toDataURL("image/png");
          const imgWidth = 190;
          const pageHeight = 290;
          const imgHeight = (canvas.height * imgWidth) / canvas.width;
          let heightLeft = imgHeight;
          let position = 10;

          doc.addImage(imgData, "PNG", 10, position, imgWidth, imgHeight);
          heightLeft -= pageHeight;

          while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            doc.addPage();
            doc.addImage(imgData, "PNG", 10, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
          }

          doc.save("resume.pdf");
        });
      });
  </script>
</body>

</html>