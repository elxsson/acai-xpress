import React, { useEffect, useState } from "react";
import ProductCard from "./ProductCard";
import "../styles/ProductList.css";
import axios from "axios";

const ProductList = ({ addToBag }) => {
  const [products, setProducts] = useState([]);

  useEffect(() => {

    axios.get("http://127.0.0.1:8000/api/products").then((response) => {
      setProducts(response.data);

    }); 
  }, []);

  return (
    <div className="product-list">
      {products.map((product) => (
        <ProductCard key={product.id} product={product} addToBag={addToBag} />
      ))}
    </div>
  );
};

export default ProductList;
