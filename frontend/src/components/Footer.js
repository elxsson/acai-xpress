import React from "react";
import twitterIcon from "../assets/twitter-icon.png";
import instagramIcon from "../assets/instagram-icon.png";
import "../styles/Footer.css"; 

const Footer = () => {
  return (
    <footer className="footer">
      <div className="footer-left">
        <p>acaiexpress@hotmail.com</p>
        <p>&copy; 2024 AçaíExpress. Todos os direitos reservados.</p>
      </div>
      <div className="footer-right">
        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
          <img src={twitterIcon} alt="Twitter" className="social-icon" />
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
          <img src={instagramIcon} alt="Instagram" className="social-icon" />
        </a>
      </div>
    </footer>
  );
};

export default Footer;
