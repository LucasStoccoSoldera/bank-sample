import '../App.css';
import {useState, useEffect} from 'react';
import { useParams } from 'react-router-dom';
import api from '../services/api';
import BankReleaseList from '../component/BankReleaseList';


function Release() {
    const[releases, setReleases] = useState([]);
    let {id} = useParams()
    const url = 'bank/' + id + '/release';

    useEffect(() =>{ 
      api.get(url).then(res =>
      {
        console.log(res);
        setReleases(res.data.financialTransactions);
      })
    });
  
    return (
      <div className="App">
        <header className="App-header">
          {releases && <BankReleaseList releases={releases} title="Contas Cadastradas" />}
        </header>
      </div>
    );
  }
  
  export default Release;