import '../App.css';
import {useState, useEffect} from 'react';
import api from '../services/api';
import BankList from '../component/BankList';

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

const Bank = () => {

  const[banks, setBanks] = useState([]);
  
  useEffect(() =>{ 
    api.get('bank').then(res =>
    {
      setBanks(res.data.data);
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
              Contas
            </Typography>
            {banks && <BankList banks={banks}/>}
            
          </Container>
        </Box>
        </ThemeProvider>
    );
  }
  
  export default Bank;