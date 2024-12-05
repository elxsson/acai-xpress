import React from "react";
import "../styles/Bag.css";

const Bag = () => {
  const bagItems = [
    { id: 1, name: "Açaí Tradicional", price: "R$15,00" },
    { id: 2, name: "Açaí com Frutas", price: "R$18,00" },
    { id: 3, name: "Açaí Premium", price: "R$22,00" },
  ];

  const totalPrice = bagItems.reduce((total, item) => {
    const priceNumber = parseFloat(item.price.replace("R$", "").replace(",", "."));
    return total + priceNumber;
  }, 0).toLocaleString("pt-BR", { style: "currency", currency: "BRL" });

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
      <button className="checkout-button">Finalizar Compra</button>
    </div>
  );
};

export default Bag;
