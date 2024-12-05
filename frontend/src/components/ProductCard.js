import React from "react";
import "../styles/ProductCard.css"; 

const ProductCard = ({ product }) => {
  return (
    <div className="product-card">
      <img src={product.image} alt={product.name} className="product-image" />
      <div className="product-details">
        <h3 className="product-name">{product.name}</h3>
        <p className="product-description">{product.description}</p>
        <button className="add-button">Adicionar</button>
      </div>
    </div>
  );
};

export default ProductCard;
