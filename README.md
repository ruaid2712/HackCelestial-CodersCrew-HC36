# HackCelestial-CodersCrew-HC36
# JobCraft Job Portal

## Overview
**JobCraft** is an advanced job portal platform designed to connect recruiters, job seekers, and interns with relevant opportunities. The platform offers a range of features including job posting, internships, collaborations, a leaderboard, resume building, and challenges. It's an all-in-one solution for both companies seeking talent and individuals looking to advance their careers.

## Key Features

### 1. **User Authentication**
- **Login/Logout System:** Secure user authentication for students, job seekers, and recruiters. After successful login, users are greeted with a "Login Successful" alert.
- **Session Management:** Tracks user sessions across pages, ensuring proper login and logout functionality.

### 2. **Job Postings & Internships**
- **Recruiter Posting Page:** Recruiters can post new job opportunities, internships, or collaborations by filling out a form with fields like title, location, duration (for internships), company name, and description.
- **Dynamic Posting:** All opportunities (jobs, internships, and collaborations) are stored in different tables based on user input and presented dynamically on the relevant pages.

### 3. **Search & Filters**
- **AJAX Search:** Job seekers can search for jobs and internships without needing to refresh the page. The search function filters opportunities based on location, keywords, and job type.
- **Location Filter:** Users can filter jobs by specific locations. Bug-free filtering ensures that the results are accurate and displayed dynamically.

### 4. **Leaderboard**
- The **Leaderboard** feature displays a ranked list of users based on their performance in challenges and overall engagement on the platform.
  - Users are ranked based on their accumulated points.
  - The leaderboard is dynamically updated and features a creative layout with rankings, names, and points.

### 5. **Challenges**
- **Coding Challenges:** Users can participate in coding challenges to test their skills. Their scores are updated based on submissions.
- **Score Tracking & Redirection:** Upon code submission, the scores are updated accurately, and users are redirected to the relevant page to see their results.

### 6. **Resume Builder**
- **AI-Powered Resume Builder:** Users can build their resumes directly on the platform using the AI-powered **OpenAI** integration.
  - The tool assists users by suggesting improvements and formatting their resumes in a professional manner.
  
### 7. **Collaborations**
- **Collaborator Posting Page:** This feature allows recruiters to post collaboration opportunities for projects that require team members from different skillsets.
- **Dynamic Listings:** Similar to job and internship listings, collaboration opportunities are dynamically presented and can be filtered based on user preferences.

### 8. **Responsive Design**
- **Cross-Device Compatibility:** The platform is fully responsive, providing a seamless experience on desktops, tablets, and mobile devices.
- **Dark Theme:** The entire portal has a visually appealing dark theme, offering a modern and sleek user interface.

## How to Use

### For Recruiters:
1. **Login**: Use the recruiter account to log in.
2. **Post Jobs/Internships**: Navigate to the "Post Opportunity" page and fill out the form with job details.
3. **Collaborations**: Recruiters can also post collaboration projects, with options for specifying skills needed.

### For Job Seekers/Interns:
1. **Login**: Students and job seekers must log in using their credentials.
2. **Search Jobs/Internships**: Use the search bar or location filter to find the desired opportunities.
3. **Participate in Challenges**: Head to the "Challenges" page and take part in coding challenges to earn points and get ranked on the leaderboard.

### For All Users:
- **Leaderboard**: Check out the leaderboard to see the top-ranked participants based on challenges.
- **Resume Builder**: Use the resume builder to create a professional resume and improve your chances of securing a job or internship.

## Tech Stack
- **Frontend**: HTML, CSS, JavaScript (AJAX)
- **Backend**: PHP (Session Management, Form Handling)
- **Database**: MySQL (Stores job postings, internships, collaborations, users, and challenge scores)
- **AI Integration**: OpenAI for the resume builder

## Installation Instructions

### Requirements:
- XAMPP or any other local server running PHP and MySQL.
- Browser for accessing the web pages.

### Steps:
1. Clone or download the repository.
2. Move the project folder to your `htdocs` directory (if using XAMPP).
3. Import the database:
   - Launch **phpMyAdmin**.
   - Create a new database called `jobcraft`.
   - Import the provided `.sql` file into this database.
4. Start your local server using XAMPP or another local environment.
5. Navigate to `localhost/jobcraft/index.php` in your browser.

## Contributing
If you wish to contribute to **JobCraft**, feel free to fork the repository and submit pull requests. Your contributions, whether it's improving UI, fixing bugs, or adding new features, are always welcome!

## License
This project is licensed under the MIT License.

## Acknowledgments
Thanks to the developers, contributors, and users for their feedback and support in building **JobCraft**. Special thanks to OpenAI for powering the resume builder feature.
