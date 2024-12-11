import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
import InitialSection from "../components/InitialSection";
import Footer from "../components/Footer";
import "../styles/CreateUser.css";

const CreateUser = () => {
  const [name, setName] = useState("");
  const [location, setLocation] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("http://127.0.0.1:8000/api/users", { name, location });

      if (response.status === 201) {
        alert(response.data.message);
        navigate("/home");
      } else {
        throw new Error("Erro ao criar usuário");
      }
    } catch (error) {
      setError("Erro ao criar usuário. Tente novamente.");
      console.error("Detalhes do erro:", error.response ? error.response.data : error.message);
    }
  };

  return (
    <div className="create-user-page">
      <InitialSection />
      <div className="form-container">
        <h2>Criar Usuário</h2>
        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="name">Nome:</label>
            <input
              type="text"
              id="name"
              value={name}
              onChange={(e) => setName(e.target.value)}
              required
            />
          </div>
          <div className="form-group">
            <label htmlFor="location">Localização:</label>
            <input
              type="text"
              id="location"
              value={location}
              onChange={(e) => setLocation(e.target.value)}
              required
            />
          </div>
          {error && <p className="error-message">{error}</p>}
          <button type="submit" className="submit-button">
            Criar Usuário
          </button>
        </form>
      </div>
      <Footer />
    </div>
  );
};

export default CreateUser;
