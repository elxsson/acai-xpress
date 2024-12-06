import React, { useState } from "react";
import axios from "axios";
import { Link, useNavigate } from "react-router-dom";
import "../styles/Login.css";

const Login = () => {
  const [formData, setFormData] = useState({ email: "", password: "" });
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      const response = await axios.post("http://localhost:8000/api/login", formData);
      const { token, user, redirect_url } = response.data;

      localStorage.setItem("token", token);
      alert(`Bem-vindo, ${user.email}!`);

      navigate(redirect_url);
    } catch (err) {

      if (err.response) {
        setError(err.response.data.message || "Erro desconhecido.");
      } else {
        setError("Erro de conexão. Tente novamente.");
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="login-page">
      <div className="login-container">
        <form className="login-form" onSubmit={handleSubmit}>
          <h1 className="login-title">Login</h1>
          {error && <div className="login-error">{error}</div>}
          <input
            type="email"
            placeholder="Email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            className="login-input"
            required
          />
          <input
            type="password"
            placeholder="Senha"
            name="password"
            value={formData.password}
            onChange={handleChange}
            className="login-input"
            required
          />
          <button type="submit" className="login-button" disabled={loading}>
            {loading ? "Carregando..." : "Entrar"}
          </button>
        </form>
        <p className="login-register-link">
          Não tem conta? <Link to="/register">Cadastre-se aqui</Link>
        </p>
      </div>
    </div>
  );
};

export default Login;
