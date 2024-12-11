// Remova a chamada reportWebVitals() da linha 2, se não for necessária.

// Declare a função normalmente
const reportWebVitals = (onPerfEntry) => {
  if (onPerfEntry && onPerfEntry instanceof Function) {
    import('web-vitals').then(({ getCLS, getFID, getFCP, getLCP, getTTFB }) => {
      getCLS(onPerfEntry);
      getFID(onPerfEntry);
      getFCP(onPerfEntry);
      getLCP(onPerfEntry);
      getTTFB(onPerfEntry);
    });
  } 
};

// Se for necessário chamar a função reportWebVitals, faça isso depois da declaração:
reportWebVitals();
