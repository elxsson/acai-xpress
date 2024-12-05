import React from "react";
import ProductCard from "./ProductCard";
import "../styles/ProductList.css";

const ProductList = () => {
  const products = [
    {
      id: 1,
      name: "Açaí Tradicional",
      description: "Açaí batido com banana e granola.",
      image: "/assets/acai1.jpg",
    },
    {
      id: 2,
      name: "Açaí com Morango",
      description: "Açaí com pedaços de morango e leite condensado.",
      image: "/assets/acai2.jpg",
    },
    {
      id: 3,
      name: "Açaí Completo",
      description: "Açaí com frutas, granola e leite condensado.",
      image: "/assets/acai3.jpg",
    },
    {
      id: 1,
      name: "Açaí Tradicional",
      description: "Açaí batido com banana e granola.",
      image: "/assets/acai1.jpg",
    },
    {
      id: 2,
      name: "Açaí com Morango",
      description: "Açaí com pedaços de morango e leite condensado.",
      image: "/assets/acai2.jpg",
    },
    {
      id: 3,
      name: "Açaí Completo",
      description: "Açaí com frutas, granola e leite condensado.",
      image: "/assets/acai3.jpg",
    },
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
