import '../App.css';
import {useState, useEffect} from 'react';
import api from '../services/api';
import BankList from '../component/BankList';


const Bank = () => {
    const[banks, setBanks] = useState([]);
  
    useEffect(() =>{ 
      api.get('bank').then(res =>
      {
        setBanks(res.data.data);
      })
    });
  
    return (
      <div className="App">
        <header className="App-header">
          {banks && <BankList banks={banks} title="Contas Cadastradas" />}
        </header>
      </div>
    );
  }
  
  export default Bank;