import '../App.css';
import {useState, useEffect, useCallback } from 'react';
import { useParams, useNavigate} from 'react-router-dom';
import api from '../services/api';
import BankReleaseList from '../component/BankReleaseList';
import * as React from 'react';
import Button from '@mui/material/Button';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';
import { createTheme, ThemeProvider } from '@mui/material/styles';

const theme = createTheme();

function Release() {

    const navigate = useNavigate();

    const[releases, setReleases] = useState([]);
    let {id} = useParams()
    const url = 'bank/' + id + '/release';

    const fetchData = useCallback(async () => {
      const data = await api.get(url).then(res =>
        {
          setReleases(res.data.financialTransactions);
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