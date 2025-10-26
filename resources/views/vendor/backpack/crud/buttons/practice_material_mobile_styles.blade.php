{{-- Mobile responsive styles for Practice Materials list --}}
<style>
    /* Mobile-first responsive design */
    @media (max-width: 768px) {
        /* Make the entire table container responsive */
        .table-responsive {
            border: none !important;
        }

        /* Transform table into mobile-friendly cards */
        .table thead {
            display: none !important;
        }

        .table tbody tr {
            display: block !important;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
            border: none !important;
            border-radius: 16px !important;
            margin-bottom: 20px !important;
            padding: 20px !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08) !important;
            position: relative !important;
        }

        .table tbody tr:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
        }

        .table tbody td {
            display: flex !important;
            align-items: center !important;
            border: none !important;
            padding: 12px 0 !important;
            border-bottom: 1px solid #f1f5f9 !important;
            position: relative !important;
        }

        .table tbody td:last-child {
            border-bottom: none !important;
            justify-content: flex-start !important;
            flex-wrap: wrap !important;
        }

        .table tbody td:before {
            content: attr(data-label) !important;
            font-weight: 700 !important;
            color: #1f2937 !important;
            font-size: 13px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            width: 90px !important;
            flex-shrink: 0 !important;
            margin-right: 15px !important;
        }

        /* Custom labels for each column */
        .table tbody td:nth-child(1):before { content: "🖼️"; }
        .table tbody td:nth-child(2):before { content: "📝"; }
        .table tbody td:nth-child(3):before { content: "📄"; }
        .table tbody td:nth-child(4):before { content: "💰"; }
        .table tbody td:nth-child(5):before { content: "🔗"; }
        .table tbody td:nth-child(6):before { content: "📅"; }
        .table tbody td:nth-child(7):before { content: "⚙️"; }

        /* Clean up the content styling */
        .table tbody td {
            font-size: 14px !important;
            line-height: 1.5 !important;
        }

        /* Image styling */
        .table tbody td:nth-child(1) img {
            width: 50px !important;
            height: 50px !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }

        /* Title styling */
        .table tbody td:nth-child(2) {
            font-weight: 600 !important;
            color: #1f2937 !important;
            font-size: 16px !important;
        }

        /* Description styling */
        .table tbody td:nth-child(3) {
            color: #6b7280 !important;
            font-size: 13px !important;
            line-height: 1.4 !important;
        }

        /* Badge content - hide HTML and show clean text */
        .table tbody td:nth-child(4) span,
        .table tbody td:nth-child(5) span {
            display: inline-block !important;
            padding: 6px 12px !important;
            border-radius: 20px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
        }

        /* Actions styling */
        .table tbody td:last-child .btn {
            margin-right: 10px !important;
            margin-bottom: 5px !important;
            font-size: 12px !important;
            padding: 6px 12px !important;
        }

        /* Content wrapper adjustments */
        .box-body, .card-body {
            padding: 15px !important;
        }

        /* Search and pagination adjustments */
        .dataTables_filter input {
            width: 100% !important;
            margin-bottom: 15px !important;
        }

        .dataTables_length select {
            width: auto !important;
        }

        .dataTables_info {
            font-size: 12px !important;
            margin-bottom: 10px !important;
        }

        .pagination {
            justify-content: center !important;
            flex-wrap: wrap !important;
        }

        .pagination .page-link {
            padding: 8px 12px !important;
            font-size: 12px !important;
        }
    }

    /* Tablet adjustments */
    @media (max-width: 1024px) and (min-width: 769px) {
        .table tbody td {
            padding: 12px 8px !important;
            font-size: 13px !important;
        }

        .table tbody td:nth-child(1) img {
            width: 45px !important;
            height: 45px !important;
        }

        .btn {
            padding: 6px 10px !important;
            font-size: 11px !important;
        }
    }

    /* Enhanced mobile header */
    @media (max-width: 768px) {
        .content-header {
            text-align: center !important;
            padding: 20px 15px !important;
        }

        .content-header h1 {
            font-size: 24px !important;
            justify-content: center !important;
        }

        .modern-create-btn {
            width: 100% !important;
            margin-bottom: 20px !important;
            justify-content: center !important;
        }

        /* Hide some less important columns on mobile */
        .table tbody td:nth-child(6) { /* Created date */
            display: none !important;
        }

        /* Adjust description truncation */
        .table tbody td:nth-child(3) {
            max-width: none !important;
            word-wrap: break-word !important;
        }
    }

    /* Extra small screens */
    @media (max-width: 480px) {
        .table tbody tr {
            padding: 12px !important;
        }

        .table tbody td {
            padding-left: 100px !important;
            font-size: 13px !important;
        }

        .table tbody td:before {
            width: 90px !important;
            font-size: 11px !important;
        }

        /* Stack action buttons vertically */
        .table tbody td:last-child .btn {
            display: block !important;
            width: 100% !important;
            margin-right: 0 !important;
            margin-bottom: 8px !important;
        }

        .content-header h1 {
            font-size: 20px !important;
        }
    }
</style>
