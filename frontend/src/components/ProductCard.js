import React from "react";
import "../styles/ProductCard.css"; 

const ProductCard = ({ product }) => {
  return (
    <div className="product-card">
      <h3>{product.name}</h3>
      <p>R$ {product.price.toFixed(2)}</p>
      <button className="add-to-cart-btn">Adicionar ao Carrinho</button>
    </div>
  );
};

export default ProductCard;
