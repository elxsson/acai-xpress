import React, { useEffect, useState } from "react";
import ProductCard from "./ProductCard";
import "../styles/ProductList.css";
import axios from "axios";

const ProductList = ({ addToBag }) => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios.get("http://127.0.0.1:8000/api/products")
      .then((response) => {

        const productArray = response.data?.products || response.data;
        
        if (Array.isArray(productArray)) {
          setProducts(productArray);
        } else {
          console.error("Erro: A resposta da API não contém um array de produtos.");
        }
      })
      .catch((error) => {
        console.error("Erro ao buscar os produtos:", error);
      });
  }, []);

  return (
    <div className="product-list">
      {Array.isArray(products) && products.length > 0 ? (
        products.map((product) => (
          <ProductCard key={product.id} product={product} addToBag={addToBag} />
        ))
      ) : (
        <div>Nenhum produto encontrado.</div>
      )}
    </div>
  );
};

export default ProductList;
