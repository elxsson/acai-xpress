import React from "react";
import logo from "../assets/logo.png";
import "../styles/InitialSection.css";

const InitialSection = () => {
  return (
    <section className="initial-section">
      <img src={logo} alt="Logo" className="logo" />
    </section>
  );
};

export default InitialSection;
