import React from "react";
import { useLocation } from "react-router-dom";
import QRCode from "react-qr-code";
import InitialSection from "./InitialSection";
import Footer from "./Footer";
import "../styles/Payment.css";

const Payment = () => {
  const location = useLocation();
  const { totalPrice } = location.state || {}; // Obtendo o totalPrice do estado

  if (totalPrice === undefined) {
    return <p>Erro: Total não encontrado. Retorne para a sacola e tente novamente.</p>;
  }

  const pixKey = "acaiexpress@hotmail.com";

  const pixPayload = `
    000201
    010212
    26${pixKey.length.toString().padStart(2, "0")}${pixKey}
    52040000
    5303986
    5802BR
    54${totalPrice.toFixed(2).replace(".", "").padStart(10, "0")}
    6304
  `.replace(/\s+/g, "");

  return (
    <div className="payment-page">
      <InitialSection />

      <div className="payment-content">
        <h2>Pagamento</h2>

        <div className="payment-details">
          <p>
            Total: <strong>{totalPrice.toLocaleString("pt-BR", { style: "currency", currency: "BRL" })}</strong>
          </p>
          <p>Escaneie o QR Code abaixo para realizar o pagamento via Pix:</p>
        </div>

        <div className="qrcode-container">
          <QRCode value={pixPayload} size={200} />
        </div>

        <p className="payment-instruction">
          Ou copie a chave Pix abaixo para realizar o pagamento manualmente:
        </p>
        <div className="payment-link">
          <strong>{pixKey}</strong>
        </div>
      </div>

      <Footer />
    </div>
  );
};

export default Payment;
