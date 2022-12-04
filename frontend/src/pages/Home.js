import '../App.css';
import { useNavigate } from 'react-router-dom';

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

const Home = () => {
    const navigate = useNavigate();
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
          <Container maxWidth="sm">
            <Typography
              component="h1"
              variant="h2"
              align="center"
              color="text.primary"
              gutterBottom
            >
              Tela de Início
            </Typography>
            <Typography variant="h5" align="center" color="text.secondary" paragraph>
              Esta aplicação simples a seguir tem o intúito de exibir
              todas as contas retornadas pela API backend desenvolvida em Laravel.
            </Typography>
            <Typography variant="h5" align="center" color="text.secondary" paragraph>
              Também é possível visualizar as movimentações da determinada conta quando selecionada.
            </Typography>
            <Stack
              sx={{ pt: 4 }}
              direction="row"
              spacing={2}
              justifyContent="center"
            >
              <Button onClick={() => {
                            navigate('/bank')
                        }} variant="contained">Contas</Button>
            </Stack>
          </Container>
        </Box>
        </ThemeProvider>
    );
  }
  
  export default Home;