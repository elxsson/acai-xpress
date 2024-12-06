import React from "react";
import ProcessingAddress from "../components/ProcessingAddress";
import ProcessingPrice from "../components/ProcessingPrice";

const ProcessingScreen = () => {
    return(
        <div>
            <div>
                <ProcessingAddress/>
            </div>
            <div className="container">
                <ProcessingPrice/>
            </div>
        </div>
        
        
    );

};

export default ProcessingScreen;