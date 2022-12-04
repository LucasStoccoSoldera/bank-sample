import { Routes, Route } from 'react-router-dom';

import Bank from './pages/Bank';
import Release from './pages/Release';
import Home from './pages/Home';

import Header from './component/Header';
import Footer from './component/Footer';

export default function App() {

  return (
    <>
      <Header/>

      <Routes>
          <Route path='/' element={<Home/>}/>
          <Route path='/bank' element={<Bank/>}/>
          <Route path='/bank/:id/release' element={<Release/>}/>

          <Route path='*' element={<h2> Rota incorreta: experimente /bank .</h2>}/>
      </Routes>

      <Footer/>
    </>
  );
}
