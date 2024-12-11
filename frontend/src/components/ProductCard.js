import React from "react";
import "../styles/ProductCard.css";
import defaultImage from "../assets/acai.png";

const ProductCard = ({ product, addToBag }) => {
  const handleAddToBag = () => {
    addToBag(product);
  };

  return (
    <div className="product-card">
      <img 
        src={product.image || defaultImage}
        alt={product.name} 
        className="product-image" 
      />
      <div className="product-details">
        <h3 className="product-name">{product.name}</h3>
        <p className="product-price">
          R$ {product.price.toFixed(2).replace(".", ",")}
        </p>
        <p className="product-description">{product.description}</p>
        <button className="add-button" onClick={handleAddToBag}>
          Adicionar
        </button>
      </div>
    </div>
  );
};

export default ProductCard;
