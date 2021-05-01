<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_export;
use TCPDF;

class Export extends BaseController
{
    protected $pdf;
    protected $admin;
    protected $export;
    public function __construct()
    {
        $this->m_admin = new M_admin();
        $this->m_export = new M_export();
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->pdfLandscape = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }

    //////////////////////// PDF ////////////////////////
    public function pdf_admin()
    {
        $data = [
            'admin' => $this->m_admin->get_admin(),
            'tot_admin' => $this->m_admin->get_num_rows_admin()
        ];

        $html = view('Export/Pdf/admin', $data);
        // $html = "awokawokaowk";

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('SI Produk Hukum Undiksha');
        $this->pdf->SetTitle('Data Admin');
        $this->pdf->SetSubject('Laporan Data Admin');
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        $this->pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->pdf->addPage('P');
        $this->pdf->SetFont('times', '', 12, false);

        // output the HTML content
        $this->pdf->writeHTML($html);
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $this->pdf->Output(date('d-m-Y') . '_Data Admin.pdf', 'D');
    }

    public function pdf_operator()
    {
        $data = [
            'operator' => $this->m_admin->get_operator(),
            'tot_opr' => $this->m_admin->get_num_rows_operator()
        ];

        $html = view('Export/Pdf/operator', $data);
        // $html = "awokawokaowk";

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('SI Produk Hukum Undiksha');
        $this->pdf->SetTitle('Data Operator');
        $this->pdf->SetSubject('Laporan Data Operator');
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        $this->pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->pdf->addPage('P');
        $this->pdf->SetFont('times', '', 12, false);

        // output the HTML content
        $this->pdf->writeHTML($html);
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $this->pdf->Output(date('d-m-Y') . '_Data Operator.pdf', 'D');
    }

    public function pdf_prohum()
    {
        $filter = $this->request->getVar('filter');
        $filterUnit = $this->request->getVar('filterUnit');
        $tahun = $this->request->getVar('tahun');
        $unit = $this->request->getVar('unit');

        if ($filter != '' && $tahun != '' && $filterUnit == 1) {
            $data['title'] = 'Laporan Data Produk Hukum Tahun ' . $tahun;
            $data['prohum'] = $this->m_export->getProhum($tahun);
        } elseif ($filterUnit == 2 && $unit != '' && $tahun != '') {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['prohum'] = $this->m_export->getProhum($tahun, $unit);
        } elseif ($filterUnit == 2 && $unit != '' && $tahun == '') {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['prohum'] = $this->m_export->getProhum($tahun, $unit);
        } else {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['tahun'] = true;
            $data['prohum'] = $this->m_export->getProhum();
        }

        if ($filterUnit == 2) {
            $html = view('Export/Pdf/produk_hukum_withUnit', $data);
        } else {
            $html = view('Export/Pdf/produk_hukum', $data);
        }

        $this->pdfLandscape->SetCreator(PDF_CREATOR);
        $this->pdfLandscape->SetAuthor('SI Produk Hukum Undiksha');
        $this->pdfLandscape->SetTitle('Data Produk Hukum');
        $this->pdfLandscape->SetSubject('Laporan Data Produk Hukum');
        $this->pdfLandscape->setPrintHeader(false);
        $this->pdfLandscape->setPrintFooter(false);
        $this->pdfLandscape->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->pdfLandscape->addPage('L');
        $this->pdfLandscape->SetFont('times', '', 12, false);

        // output the HTML content
        $this->pdfLandscape->writeHTML($html);
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $this->pdfLandscape->Output(date('d-m-Y') . '_Data Produk Hukum.pdf', 'D');
    }
    //////////////////////// END PDF ////////////////////////

    //////////////////////// EXCEL ////////////////////////
    public function excel_admin()
    {
        $data['title'] = 'Laporan Data Admin';
        $data['admin'] = $this->m_admin->get_admin();
        $data['tot_admin'] = $this->m_admin->get_num_rows_admin();
        return view('Export/Excel/admin', $data);
    }

    public function excel_operator()
    {
        $data['title'] = 'Laporan Data Operator';
        $data['opr'] = $this->m_admin->get_operator();
        $data['tot_opr'] = $this->m_admin->get_num_rows_operator();
        return view('Export/Excel/operator', $data);
    }

    public function excel_prohum()
    {
        $filter = $this->request->getVar('filter');
        $filterUnit = $this->request->getVar('filterUnit');
        $tahun = $this->request->getVar('tahun');
        $unit = $this->request->getVar('unit');

        if ($filter != '' && $tahun != '' && $filterUnit == 1) {
            $data['title'] = 'Laporan Data Produk Hukum Tahun ' . $tahun;
            $data['prohum'] = $this->m_export->getProhum($tahun);
        } elseif ($filterUnit == 2 && $unit != '' && $tahun != '') {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['prohum'] = $this->m_export->getProhum($tahun, $unit);
        } elseif ($filterUnit == 2 && $unit != '' && $tahun == '') {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['prohum'] = $this->m_export->getProhum($tahun, $unit);
        } else {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['tahun'] = true;
            $data['prohum'] = $this->m_export->getProhum();
        }

        if ($filterUnit == 2) {
            return view('Export/Excel/produk_hukum_withUnit', $data);
        } else {
            return view('Export/Excel/produk_hukum', $data);
        }
    }
    //////////////////////// END EXCEL ////////////////////////
}
