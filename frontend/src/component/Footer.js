import * as React from 'react';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Link from '@mui/material/Link';
import { createTheme, ThemeProvider } from '@mui/material/styles';


function Copyright() {
    return (
      <Typography variant="body2" color="text.secondary" align="center">
        {'Copyright © '}
        <Link color="inherit" href="https://mui.com/">
          Qyon
        </Link>{' '}
        {new Date().getFullYear()}
        {'.'}
      </Typography>
    );
  }

const theme = createTheme();

const Footer = () => {
    return (
    <ThemeProvider theme={theme}>
    <CssBaseline />
    <Box sx={{ display: 'flex', width: '100%', justifyContent: 'center'}}>
      <Box sx={{ bgcolor: 'background.paper', p: 6, bottom:0, position: 'fixed'}} component="footer">
        <Typography variant="h6" align="center" gutterBottom>
          Lucas Stocco Soldera
        </Typography>
        <Typography
          variant="subtitle1"
          align="center"
          color="text.secondary"
          component="p"
        >
        Minha primeira aplicação em ReactJS. É simples mas é de coração.
            </Typography>
                    <Typography
          variant="subtitle1"
          align="center"
          color="text.secondary"
          component="p"
        >
          
          Feito de madrugada com uma curva de aprendizado tenebrosa.
        </Typography>
        <Copyright />
      </Box>
      </Box>
      </ThemeProvider>
    );
  }
  
  export default Footer;