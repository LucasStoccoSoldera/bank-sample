import { useNavigate } from 'react-router-dom';
import * as React from 'react';
import { styled } from '@mui/material/styles';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell, { tableCellClasses } from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import Button from '@mui/material/Button';
import EditIcon from '@mui/icons-material/Edit';

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


const BankList = ({banks}) => {

    const navigate = useNavigate();

    return (
        <TableContainer component={Paper}>   
            <Table sx={{ minWidth: 700}} aria-label="tabela de contas">
                <TableHead>
                <TableRow>
                    <StyledTableCell align="left">Conta</StyledTableCell>
                    <StyledTableCell align="left">Descrição</StyledTableCell>
                    <StyledTableCell align="right">Saldo</StyledTableCell>
                    <StyledTableCell align="right">Histórico</StyledTableCell>
                </TableRow>
                </TableHead>
                <TableBody>
                {banks.map((bank) => (
                    <StyledTableRow key={bank.id}>
                    <StyledTableCell align="left">{bank.id}</StyledTableCell>
                    <StyledTableCell align="left">{bank.conta}</StyledTableCell>
                    <StyledTableCell align="right">{bank.total}</StyledTableCell>
                    <StyledTableCell align="right"><Button onClick={() => {
                                    navigate('/bank/'+ bank.id +'/release')
                                }} type="button" variant="contained"><EditIcon/></Button></StyledTableCell>
                    </StyledTableRow>
                ))}
                </TableBody>
            </Table>
        </TableContainer>
    );
}

export default BankList;