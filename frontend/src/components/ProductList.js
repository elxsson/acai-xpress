import React from "react";
import ProductCard from "./ProductCard";
import "../styles/ProductList.css";

const ProductList = () => {
  const products = [
    { id: 1, name: "Açaí com Frutas", price: 15.99 },
    { id: 2, name: "Açaí com Granola", price: 13.49 },
    { id: 3, name: "Açaí com Chocolate", price: 17.29 },
    
  ];

  return (
    <div className="product-list">
      {products.map((product) => (
        <ProductCard key={product.id} product={product} />
      ))}
    </div>
  );
};

export default ProductList;
