import React, { useState } from "react";
import axios from "axios";
import { Link, useNavigate } from "react-router-dom";
import "../styles/Register.css";

const Register = () => {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    email: "",
    password: "",
    confirmPassword: "",
  });
  const [error, setError] = useState("");
  const [success, setSuccess] = useState(false);
  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");
    setLoading(true);

    if (formData.password !== formData.confirmPassword) {
      setError("As senhas não coincidem.");
      setLoading(false);
      return;
    }

    try {
      const response = await axios.post("http://localhost:8000/api/register", {
        email: formData.email,
        password: formData.password,
      });

      setSuccess(true);
      alert("Cadastro realizado com sucesso!");

      const { token } = response.data;
      localStorage.setItem("token", token);

      navigate("/");
    } catch (err) {
      setError("Erro ao realizar cadastro. Tente novamente mais tarde.");
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="register-page">
      <div className="register-container">
        <form className="register-form" onSubmit={handleSubmit}>
          <h1 className="register-title">Criar Conta</h1>
          {error && <div className="register-error">{error}</div>}
          {success && <div className="register-success">Cadastro realizado com sucesso!</div>}
          
          <input
            type="email"
            placeholder="Email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            className="register-input"
            required
          />
          <input
            type="password"
            placeholder="Senha"
            name="password"
            value={formData.password}
            onChange={handleChange}
            className="register-input"
            required
          />
          <input
            type="password"
            placeholder="Confirme a senha"
            name="confirmPassword"
            value={formData.confirmPassword}
            onChange={handleChange}
            className="register-input"
            required
          />
          <button type="submit" className="register-button" disabled={loading}>
            {loading ? "Carregando..." : "Cadastrar"}
          </button>
        </form>
        <p className="register-login-link">
          Já tem conta? <Link to="/login">Faça login aqui</Link>
        </p>
      </div>
    </div>
  );
};

export default Register;
