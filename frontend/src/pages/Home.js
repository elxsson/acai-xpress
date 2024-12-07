import React from "react";
import InitialSection from "../components/InitialSection";
import ProductList from "../components/ProductList";
import Bag from "../components/Bag";
import Footer from "../components/Footer";
import "../styles/Home.css";

const Home = () => {
  return (
    <div>
      <InitialSection />
      <h1>Mais pedidos</h1>
      <div className="content-wrapper">
        <ProductList />
        <Bag />
      </div>
      <Footer />
    </div>
  );
};

export default Home;
