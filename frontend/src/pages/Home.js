import '../App.css';
import { Link } from 'react-router-dom';


const Home = () => {
    return (
    <div className="App">
        <h2>
            Bank Sample Principal
        </h2>
        <nav>
            <Link to="/bank"> Contas </Link>
        </nav>
    </div>
    );
  }
  
  export default Home;