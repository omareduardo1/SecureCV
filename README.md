# 🔐 SecureCV — Cybersecurity Project

**Author:** Omar Eduardo Borges Montero  
**Course:** Cybersecurity — University of Udine  
**Academic Year:** 2024–2025  

---

## 🧠 Overview

**SecureCV** (Secure Dynamic CV) is a **web-based cybersecurity project** designed to create a **secure and interactive personal portfolio** platform for managing and distributing personal CVs and professional certificates.  
The system integrates **data protection, encryption, and steganography** techniques to ensure **confidentiality, integrity, and authenticity** of all shared information.

Developed using **PHP, HTML, CSS, JavaScript, MySQL**, and **Python** (for steganography), the project simulates a realistic, privacy-oriented professional website with access control, user tracking, and encrypted communications.

---

## 🖼️ Technical Screenshot Gallery

<p align="center">
  <img src="assets/Schermata%20SecureCV.png" width="600" alt="Main Screen">
  <br><em>Main dashboard of SecureCV</em>
</p>

<p align="center">
  <img src="assets/Schermata%20SecureCV-2.png" width="600" alt="Homepage View">
  <br><em>Homepage with dynamic portfolio sections</em>
</p>

<p align="center">
  <img src="assets/Schermata%203.png" width="600" alt="Alternate Screen">
  <br><em>Interactive content area and visual CV elements</em>
</p>

<p align="center">
  <img src="assets/Area%20riservata.png" width="600" alt="Reserved Area">
  <br><em>Restricted access area for authenticated users</em>
</p>

<p align="center">
  <img src="assets/Area%20riservata2.png" width="600" alt="Reserved Area 2">
  <br><em>Protected document section and download tracking</em>
</p>

<p align="center">
  <img src="assets/Password%20criptate.png" width="600" alt="Encrypted Passwords">
  <br><em>Database view — passwords hashed and secured</em>
</p>

<p align="center">
  <img src="assets/Messaggi%20in%20chiaro.png" width="600" alt="Unencrypted Messages">
  <br><em>Contact form before AES encryption</em>
</p>

<p align="center">
  <img src="assets/Messaggio%20criptatp.png" width="600" alt="Encrypted Messages">
  <br><em>Encrypted messages stored in the database</em>
</p>

---

## 🎯 Main Objectives

1. **User authentication and registration**  
   - Secure password hashing using `password_hash()`  
   - Session-based access control  

2. **Access-restricted area**  
   - Only authenticated users can download protected documents  

3. **Download tracking**  
   - Logging of user ID, IP address, and timestamp for each download  

4. **Encrypted contact system**  
   - Messages encrypted with **AES-256-CBC**, decrypted only in the admin area  

5. **Steganography for digital watermarking**  
   - Invisible ownership signature embedded in images using Python and PIL  

6. **Cookie and session management**  
   - Monitors unique site access and ensures secure navigation  

7. **Input validation and error suppression**  
   - `preg_match()` filters and `error_reporting(0)` prevent data leakage  

---

## 🧩 System Architecture

| Layer | Technologies |
|-------|---------------|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP, Python (for steganography) |
| **Database** | MySQL (phpMyAdmin) |
| **Environment** | XAMPP / Apache on macOS |
| **Virtual Host** | Configured as `https://securecv.local` |

### Logical Flow

- **Registration:** user data validated and securely stored  
- **Login:** session started after password verification  
- **Reserved Area:** protected access to personal documents  
- **Contact Module:** messages encrypted in database, decrypted only by admin  
- **Steganography:** invisible data embedded in images during download  

---

## 🧬 Security Features

- 🔒 Secure password storage (never in plain text)  
- 🧑‍💻 Session-based user authentication  
- 🧩 AES encryption for messages and sensitive data  
- 🕵️‍♂️ Steganography in downloadable files as invisible ownership signature  
- 🧱 Input validation to mitigate injection attacks  
- 📜 Access logs for every download and action  

---

## 🧠 Technical Highlights

- Developed entirely without frameworks to maintain full control over security logic  
- Python module used for image steganography, leveraging **Computer Vision** techniques learned in other AI courses  
- Implemented automatic **database creation script** (`init_db.php`) for portability across systems  
- Configured **SSL certificates** and local Virtual Host for HTTPS simulation  
- Optimized user interface for simplicity and intuitive access  

---

## 🧩 Project Structure

```
SecureCV/
│
├── finalReport/      # Project documentation and technical report
├── projectCode/      # Full web application source code (HTML, CSS, PHP, JS, Python)
└── userManual/       # Installation and usage guide
```

---

## 🧪 How to Run Locally

```bash
git clone https://github.com/omareduardo1/SecureCV.git
cd SecureCV/projectCode
# Run on XAMPP or local Apache environment
# Ensure database credentials in config.php match your local setup
```

Access via:
```
https://securecv.local
```

---

## 🧩 Future Improvements

- Integration with AI-driven CV analysis (NLP + recommendation system)  
- Multi-user encrypted document sharing  
- Logging dashboard for admin analytics  
- Optional JWT-based authentication for API extensions  

---

## 🏁 Conclusion

This project demonstrates the combination of **cybersecurity engineering, web development, and AI techniques** to build a fully functional secure web system.  
It merges **academic research, real-world technical implementation, and personal creativity**, embodying the principles of *privacy-by-design* and *secure software engineering*.