import React, { useState } from "react";
import InitialSection from "../components/InitialSection";
import ProductList from "../components/ProductList";
import Bag from "../components/Bag";
import Footer from "../components/Footer";
import "../styles/Home.css";

const Home = () => {
  const [bagItems, setBagItems] = useState([]);

  const addToBag = (product) => {
    setBagItems((prevItems) => [...prevItems, product]);
  };

  return (
    <div>
      <InitialSection />
      <h1>Mais pedidos</h1>
      <div className="content-wrapper">
        <ProductList addToBag={addToBag} />
        <Bag bagItems={bagItems} />
      </div>
      <Footer />
    </div>
  );
};

export default Home;
