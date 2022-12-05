import * as React from 'react';
import { styled } from '@mui/material/styles';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell, { tableCellClasses } from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';

const StyledTableCell = styled(TableCell)(({ theme }) => ({
  [`&.${tableCellClasses.head}`]: {
    backgroundColor: theme.palette.common.black,
    color: theme.palette.common.white,
  },
  [`&.${tableCellClasses.body}`]: {
    fontSize: 14,
  },
}));

const StyledTableRow = styled(TableRow)(({ theme }) => ({
  '&:nth-of-type(odd)': {
    backgroundColor: theme.palette.action.hover,
  },
  // hide last border
  '&:last-child td, &:last-child th': {
    border: 0,
  },
}));



const BankReleaseList = ({releases}) => {

    return (
        <TableContainer component={Paper}>   
            <Table sx={{ minWidth: 700, display:'table'}} aria-label="tabela de contas">
                <TableHead>
                <TableRow>
                    <StyledTableCell align="left">Data</StyledTableCell>
                    <StyledTableCell align="left">Hora</StyledTableCell>
                    <StyledTableCell align="left">Tipo</StyledTableCell>
                    <StyledTableCell align="right">Valor</StyledTableCell>
                </TableRow>
                </TableHead>
                <TableBody>
                {releases.map((release) => (
                    <StyledTableRow key={release.id}>
                      <StyledTableCell align="left">{new Date(release.created_at).toLocaleDateString('pt-BR')}</StyledTableCell>
                      <StyledTableCell align="left">{new Date(release.created_at).toLocaleTimeString('pt-BR')}</StyledTableCell>
                      <StyledTableCell align="left">{release.movimento}</StyledTableCell>
                      <StyledTableCell align="right">{release.valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}</StyledTableCell>
                    </StyledTableRow>
                ))}
                </TableBody>
            </Table>
        </TableContainer>
    );
}

export default BankReleaseList;