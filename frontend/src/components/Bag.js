import React from "react";
import { useNavigate } from "react-router-dom";
import "../styles/Bag.css";

const Bag = ({ bagItems }) => {
  const navigate = useNavigate();

  const totalPrice = bagItems.reduce((total, item) => {
    const priceNumber = parseFloat(item.price.replace("R$", "").replace(",", "."));
    return total + priceNumber;
  }, 0).toLocaleString("pt-BR", { style: "currency", currency: "BRL" });

  const handleCheckout = () => {
    navigate("/");
  };

  return (
    <div className="bag">
      <div className="bag-title">Sua Sacola</div>
      <ul className="bag-items">
        {bagItems.map((item) => (
          <li key={item.id} className="bag-item">
            <span className="bag-item-name">{item.name}</span>
            <span className="bag-item-price">{item.price}</span>
          </li>
        ))}
      </ul>
      <div className="total-price">Total: {totalPrice}</div>
      <button className="checkout-button" onClick={handleCheckout}>
        Finalizar Compra
      </button>
    </div>
  );
};

export default Bag;
