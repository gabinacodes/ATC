import React from "react";
import "./../css/footer.css";
import {
  FaTwitter,
  FaFacebook,
  FaWhatsapp,
  FaInstagram,
  FaLinkedin,
} from "react-icons/fa";

const Footer = () => {
  return (
    <footer>
      <section className="main-footer">
        <div className="left-footer">
          <p>About Us</p>
          <p>Contact</p>
          <p>Check Result</p>
          <p>Courses</p>
          <p>Workstation</p>
          <p>Online Training</p>
          <p>Study Resources</p>
          <p>In-company Training</p>
          <p>Privacy</p>
          <p>Policy Statement</p>
        </div>
        <div className="right-footer">
          <p>Join Our social media conversations @trainovation</p>
          <div class="follow">
            <a
              href="https://www.instagram.com/atchub_/"
              target="_blank"
              rel="noreferrer">
              <FaInstagram />
            </a>
            <a
              href="https://api.whatsapp.com/send?phone=+2349035807050"
              target="_blank"
              rel="noreferrer">
              <FaWhatsapp />
            </a>
            <a
              href="https://www.facebook.com/ATChubb"
              target="_blank"
              rel="noreferrer">
              <FaFacebook />
            </a>
            <a
              href="https://twitter.com/atchub_"
              target="_blank"
              rel="noreferrer">
              <FaTwitter />
            </a>
            <a
              href="https://www.linkedin.com/company/africa-trainovation-consulting/"
              target="_blank"
              rel="noreferrer">
              <FaLinkedin />
            </a>
          </div>
        </div>
      </section>
      <section className="sub-footer">
        <p>&copy; 2022 Africa Trainovation Consulting, All right reserved</p>
      </section>
    </footer>
  );
};

export default Footer;
