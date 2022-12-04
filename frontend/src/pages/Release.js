import '../App.css';
import {useState, useEffect} from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import api from '../services/api';
import BankReleaseList from '../component/BankReleaseList';
import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Button from '@mui/material/Button';
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import CssBaseline from '@mui/material/CssBaseline';
import Grid from '@mui/material/Grid';
import Stack from '@mui/material/Stack';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';
import Link from '@mui/material/Link';
import { createTheme, ThemeProvider } from '@mui/material/styles';

const theme = createTheme();

function Release() {

    const navigate = useNavigate();

    const[releases, setReleases] = useState([]);
    let {id} = useParams()
    const url = 'bank/' + id + '/release';

    useEffect(() =>{ 
      api.get(url).then(res =>
      {
        setReleases(res.data.financialTransactions);
      })
    });
  
    return (
      <ThemeProvider theme={theme}>
      <CssBaseline />
      <Box
        sx={{
          bgcolor: 'background.paper',
          pt: 8,
          pb: 6,
        }}
      >
        <Container sx={{display:'table'}} maxWidth="sm">
          <Typography
            component="h1"
            variant="h2"
            align="center"
            color="text.primary"
            gutterBottom
          >
            Movimentações
          </Typography>
          {releases && <BankReleaseList releases={releases}/>}

          <Box sx={{marginTop: '20px'}}>
          <Button sx={{width: '100%'}} onClick={() => {
                            navigate('/bank')
                        }} type="button" variant="contained"> Voltar </Button>
          </Box>
        </Container>
      </Box>
      </ThemeProvider>
    );
  }
  
  export default Release;