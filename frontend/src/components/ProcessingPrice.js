import React from "react";
import "../styles/ProcessingPrice.css";

const ProcessingPrice = () => {
    return(
        <div className="Preco subtotal-flex">
            <h1>Subtotal <span>R$ 0,00</span></h1>
            <h1>Taxa de entrega <span>R$ 0,00</span></h1>
            <h1>Total <span>R$ 0,00</span></h1>
        </div>


    );
};

export default ProcessingPrice