import React from "react";
import "../styles/PaymentScreen.css";
import PaymentValor from "./PaymentValor";
import QR from "../assets/QR.png";

const PaymentScreen = () =>{
    
    return (
        <div>
            <div className="container-center">
                <div className="leftContent">
                    <img src={QR} alt="QR Code para pagamento" className="qrImg"/>
                </div>
                <PaymentValor/>
            </div>
        </div>
    );
};
export default PaymentScreen;