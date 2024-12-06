import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Home from "./pages/Home";
import ProcessingScreen from "./pages/ProcessingScreen";
import PaymentScreen from "./components/PaymentScreen";

const App = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/ProcessodePagamento" element={<ProcessingScreen/>}/>
        <Route path="/TeladePagamento" element={<PaymentScreen/>}/>
      </Routes>
    </Router>
  );
};

export default App;
