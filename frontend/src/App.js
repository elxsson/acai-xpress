import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Home from "./pages/Home";
import ProcessingScreen from "./pages/ProcessingScreen";
import PaymentScreen from "./components/PaymentScreen";
import Login from "./pages/Login";
import Register from "./pages/Register"; 

const App = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/ProcessodePagamento" element={<ProcessingScreen/>}/>
        <Route path="/TeladePagamento" element={<PaymentScreen/>}/>
        <Route path="/Login" element={<Login/>}/>
        <Route path="/Register" element={<Register/>}/>
      </Routes>
    </Router>
  );
};

export default App;
