import React from "react";
import { useNavigate } from "react-router-dom";
import "../styles/Bag.css";

const Bag = ({ bagItems }) => {
  const navigate = useNavigate();

  const totalPrice = bagItems.reduce((total, item) => {
    return total + item.price;
  }, 0);

  const formattedTotalPrice = totalPrice.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });

  const handleCheckout = () => {
    navigate("/payment", { state: { totalPrice } }); // Passando totalPrice como estado
  };

  return (
    <div className="bag">
      <div className="bag-title">Sua Sacola</div>
      <ul className="bag-items">
        {bagItems.map((item) => (
          <li key={item.id} className="bag-item">
            <span className="bag-item-name">{item.name}</span>
            <span className="bag-item-price">
              {item.price.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL",
              })}
            </span>
          </li>
        ))}
      </ul>
      <div className="total-price">Total: {formattedTotalPrice}</div>
      <button className="checkout-button" onClick={handleCheckout}>
        Finalizar Compra
      </button>
    </div>
  );
};

export default Bag;
