import '../App.css';
import {useState, useEffect, useCallback} from 'react';
import api from '../services/api';
import BankList from '../component/BankList';

import * as React from 'react';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';
import { createTheme, ThemeProvider } from '@mui/material/styles';

const theme = createTheme();

const Bank = () => {

  const[banks, setBanks] = useState([]);
  
  const fetchData = useCallback(async () => {
    const data = await api.get('bank').then(res =>
    {
      setBanks(res.data.data);
    });
  }, []);
  
  useEffect(() =>{ 
    fetchData()
    .catch(console.error);
  }, [fetchData]);

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