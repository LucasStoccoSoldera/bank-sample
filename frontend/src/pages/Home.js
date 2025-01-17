import '../App.css';
import { useNavigate } from 'react-router-dom';

import * as React from 'react';
import Button from '@mui/material/Button';
import CssBaseline from '@mui/material/CssBaseline';
import Stack from '@mui/material/Stack';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';
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